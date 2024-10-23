<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('whereLikeSearch', function ($attributes, string $searchTerm) {
            $like = 'LIKE';

            $this->where(function (Builder $query) use ($attributes, $searchTerm, $like) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        Str::contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm, $like) {
                            $this->handleNestedRelations($query, $attribute, $searchTerm, $like);
                        },
                        function (Builder $query) use ($attribute, $searchTerm, $like) {
                            $query->orWhere($attribute, $like, "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });

        Builder::macro('handleNestedRelations', function (Builder $query, $attribute, $searchTerm, $like) {
            $relations = explode('.', $attribute);
            $relationAttribute = array_pop($relations);
            $relationChain = implode('.', $relations);

            $query->orWhereHas($relationChain, function (Builder $query) use ($relationAttribute, $searchTerm, $like) {
                $query->where($relationAttribute, $like, "%{$searchTerm}%");
            });
        });
    }
}
