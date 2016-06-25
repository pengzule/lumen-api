<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use Eshop\Repositories\CategoryRepository;

class CategoryController extends Controller
{
  protected $categoryRepository;

  /**
   * CategoryController constructor.
   * @param CategoryRepository $categoryRepository
     */
  public function __construct(CategoryRepository $categoryRepository)
  {
    $this->categoryRepository = $categoryRepository;
  }

  public function getCategory()
  {
   return $this->categoryRepository->toCategory();

  }

}