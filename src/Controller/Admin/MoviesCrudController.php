<?php

namespace App\Controller\Admin;

use App\Entity\Movies;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class MoviesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Movies::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            SlugField::new('slug')
                ->setTargetFieldName('title'),
            AssociationField::new('categories')->setRequired(true),
            TextEditorField::new('description'), //TODO Desactiver div en BDD
            ImageField::new('poster')
                ->setBasePath('upload/images/poster')
                ->setUploadDir('public/upload/images/poster'),
            DateTimeField::new('release_date')->setFormat('dd.MM.yyyy'), //TODO format sans heure
            TextField::new('director'),
            TextField::new('productor'),
            // AssociationField::new('actors'),//TODO
            // AssociationField::new('playlists'),//TODO
        ];
    }
    
}
