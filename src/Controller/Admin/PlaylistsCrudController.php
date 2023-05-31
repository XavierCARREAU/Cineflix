<?php

namespace App\Controller\Admin;

use App\Entity\Playlists;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlaylistsCrudController extends AbstractCrudController
{

    public const ACTION_DUPLICATE = 'duplicate';

    public static function getEntityFqcn(): string
    {
        return Playlists::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $duplicate = Action::new(self::ACTION_DUPLICATE)
            ->linkToCrudAction('duplicateItem')
            ->setCssClass('btn btn-secondary');
        
        return $actions
            ->add(Crud::PAGE_EDIT, $duplicate);
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name'),
            TextareaField::new('description'),
            AssociationField::new('created_by')
                ->setRequired(true),
            AssociationField::new('whitelist', 'Abonnés'),
            AssociationField::new('Playlists_Movies', 'Liste des filmes'),
            BooleanField::new('public'),
        ];
    }
    

    public function duplicateItem(AdminContext $contexte, AdminUrlGenerator $adminUrlGenerator, EntityManagerInterface $em): Response
    {   
        /** @var Playlists $item */
        $item = $contexte->getEntity()->getInstance();

        $duplicatedItem = clone $item;

        parent::persistEntity($em, $duplicatedItem);
        $url = $adminUrlGenerator->setController(self::class)
            ->setAction(Action::DETAIL)
            ->setEntityId($duplicatedItem->getId())
            ->generateUrl();

        return $this->redirect($url);
    }
}
