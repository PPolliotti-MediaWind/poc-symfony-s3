<?php

namespace App\Controller\Admin;

use App\Entity\Picture;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class PictureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Picture::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new("name"),
            TextField::new("pictureFile", "Upload")->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new("pictureName", "File")->setBasePath("http://127.0.0.1:9000/pictures/")->hideOnForm(),
        ];
    }
}
