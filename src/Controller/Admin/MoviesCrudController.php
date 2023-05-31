<?php

namespace App\Controller\Admin;

use App\Entity\Movies;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MoviesCrudController extends AbstractCrudController
{
    public const ACTION_DUPLICATE = 'duplicate';

    public static function getEntityFqcn(): string
    {
        return Movies::class;
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
            TextField::new('title', 'Titre'),
            SlugField::new('slug', 'Slug')
                ->setTargetFieldName('title'),
            AssociationField::new('categories', 'Catégories')
                ->setRequired(true),
            TextareaField::new('description', 'Description'),
            ImageField::new('poster', 'Affiche')
                ->setBasePath('upload/images/poster')
                ->setUploadDir('public/upload/images/poster')
                ->setRequired($pageName === Crud::PAGE_NEW),
            DateField::new('release_date', 'Date de sortie'),
            TextField::new('director', 'Réalisateur'),
            TextField::new('productor', 'Producteur'),
            // ,//TODO
        ];
    }

    public function duplicateItem(AdminContext $contexte, AdminUrlGenerator $adminUrlGenerator, EntityManagerInterface $em): Response
    {   
        /** @var Movies $item */
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
