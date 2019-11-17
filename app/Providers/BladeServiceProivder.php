<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProivder extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::directive('errorClass', function ($input) {
            return
                '<?php if($errors->has(' . $input . ')):?>' .
                '<?php echo "is-invalid"?>' .
                '<?php endif;?>';
        });


        \Blade::directive('errorBlock', function ($input) {
            return
                '<?php if($errors->has(' . $input . ')):?>'.
                    '<div class="invalid-feedback">'.
                        '<strong><?php echo $errors->first(' . $input . ') ?></strong>'.
                    '</div>'.
                 '<?php endif;?>';
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}
