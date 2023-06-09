<?php

namespace App\Controller\Admin;

use App\Entity\Actors;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActorsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actors::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            AssociationField::new('movies_actors', 'Films'),
        ];
    }
    
}
