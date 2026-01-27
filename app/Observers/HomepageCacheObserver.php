<?php

namespace App\Observers;

use App\Http\Controllers\Frontend\HomeController;

/**
 * Observer to clear homepage cache when models are modified
 */
class HomepageCacheObserver
{
    public function created($model): void
    {
        $this->clearCache();
    }

    public function updated($model): void
    {
        $this->clearCache();
    }

    public function deleted($model): void
    {
        $this->clearCache();
    }

    protected function clearCache(): void
    {
        HomeController::clearCache();
    }
}
