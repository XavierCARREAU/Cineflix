<?php

namespace App\Controller\Admin;

use App\Entity\Playlists;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlaylistsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Playlists::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
