<?php

namespace App\Observers;

use App\Models\MainCategory;
use App\Models\SubCategory;

class SubCategoryObserver
{
    /**
     * Handle the SubCategory "created" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function created(SubCategory $subCategory)
    {
        $parent_main_category = MainCategory::find($subCategory->main_categories_id);
        if ($parent_main_category->status === 'inactive' && $subCategory->status == 'active')
            $subCategory->update(['status'=>  'inactive']);

    }

    /**
     * Handle the SubCategory "updated" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function updated(SubCategory $subCategory)
    {
//        $subCategory->vendors()->update(['status' => $subCategory->status]);
    }

    /**
     * Handle the SubCategory "deleted" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function deleted(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the SubCategory "restored" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function restored(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the SubCategory "force deleted" event.
     *
     * @param SubCategory $subCategory
     * @return void
     */
    public function forceDeleted(SubCategory $subCategory)
    {
        //
    }
}
