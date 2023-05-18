<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Utilisateurs')
            ->setEntityLabelInSingular('Utilisateur');
            // ->setPageTitle('index', 'Cineflix - Administration - Utilisateurs');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            // ImageField::new('profil_pic'),
            TextField::new('email')
                ->hideWhenUpdating()
                ->setFormTypeOption('disabled', 'disabled'),
            TextField::new('username'),
            ArrayField::new('roles'),
            BooleanField::new('is_verified')
                ->setFormTypeOption('disabled', 'disabled'),
            DateTimeField::new('created_at')
                ->setFormTypeOption('disabled', 'disabled'),
            
        ];
    }
    
}
