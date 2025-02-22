<?php

namespace R64\NovaFields;

use Config;
use Illuminate\Support\Str;

trait Configurable
{
    /**
     * The base container classes of the field.
     *
     * @var string
     */
    public $wrapperClasses = 'flex border-b border-40';

    /**
     * The base field classes of the field.
     *
     * @var string
     */
    public $fieldClasses = 'w-1/2 px-8 py-6';

    /**
     * The base wrapper classes for label.
     *
     * @var string
     */
    public $labelClasses = 'w-1/5 px-8 py-6';

    /**
     * The base label classes for the detail view.
     *
     * @var string
     */
    public $panelLabelClasses = 'w-1/4 py-4';

    /**
     * The base field classes for the detail view.
     *
     * @var string
     */
    public $panelFieldClasses = 'w-3/4 py-4';

    /**
     * The base wrapper classes for the detail view.
     *
     * @var string
     */
    public $panelWrapperClasses = 'flex border-b border-40';

    /**
     * The base label classes for the detail view.
     *
     * @var string
     */
    public $indexLinkClasses = 'no-underline dim text-primary font-bold';

    /**
     * The base excerpt classes.
     *
     * @var string
     */
    public $excerptClasses = 'cursor-pointer dim inline-block text-primary font-bold';

    /**
     * Set the container classes that should be applied instead of default ones.
     *
     * @param  string  $classes
     * @return $this
     */
    public function wrapperClasses($classes)
    {
        $this->wrapperClasses = $classes;

        return $this;
    }

    /**
     * Set the index classes that should be applied instead of default ones.
     *
     * @param  string  $classes
     * @return $this
     */
    public function indexClasses($classes)
    {
        $this->indexClasses = $classes;

        return $this;
    }

    /**
     * Set the input classes that should be applied instead of default ones.
     *
     * @param  string  $classes
     * @return $this
     */
    public function inputClasses($classes)
    {
        $this->inputClasses = $classes;

        return $this;
    }

    /**
     * Set the field wrapper classes that should be applied instead of default ones.
     *
     * @param  string  $classes
     * @return $this
     */
    public function fieldClasses($classes)
    {
        $this->fieldClasses = $classes;

        return $this;
    }

    /**
     * Set the label wrapper classes that should be applied instead of default ones.
     *
     * @param  string  $classes
     * @return $this
     */
    public function labelClasses($classes)
    {
        $this->labelClasses = $classes;

        return $this;
    }

    /**
     * Set the label wrapper classes in detail panel that should be applied instead of default ones.
     *
     * @param  string  $classes
     * @return $this
     */
    public function panelLabelClasses($classes)
    {
        $this->panelLabelClasses = $classes;

        return $this;
    }

    /**
     * Set the field classes in detail panel that should be applied instead of default ones.
     *
     * @param  string  $classes
     * @return $this
     */
    public function panelFieldClasses($classes)
    {
        $this->panelFieldClasses = $classes;

        return $this;
    }

    /**
     * Set the wrapper in detail panel that should be applied instead of default ones.
     *
     * @param  string  $classes
     * @return $this
     */
    public function panelWrapperClasses($classes)
    {
        $this->panelWrapperClasses = $classes;

        return $this;
    }

    /**
     * Set the link classes in index view that should be applied instead of the default.
     *
     * @param  string  $classes
     * @return $this
     */
    public function indexLinkClasses($classes)
    {
        $this->indexLinkClasses = $classes;

        return $this;
    }

    /**
     * Set the excerpt classes that should be applied instead of default ones.
     *
     * @param  string  $classes
     * @return $this
     */
    public function excerptClasses($classes)
    {
        $this->excerptClasses = $classes;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the creation view.
     *
     * @return $this
     */
    public function hideWhenCreating()
    {
        parent::hideWhenCreating();

        return $this->withMeta(['hideWhenCreating' => true]);
    }

    /**
     * Specify that the element should be hidden from the update view.
     *
     * @return $this
     */
    public function hideWhenUpdating()
    {
        parent::hideWhenUpdating();

        return $this->withMeta(['hideWhenUpdating' => true]);
    }

    /**
     * Specify that the element should be hidden from the detail view.
     *
     * @return $this
     */
    public function hideFromDetail()
    {
        parent::hideFromDetail();

        return $this->withMeta(['hideFromDetail' => true]);
    }

    /**
     * Specify that the index view should show as a link to the resource
     *
     * @return $this
     */
    public function showLinkInIndex()
    {
        return $this->withMeta(['showLinkInIndex' => true]);
    }

    /**
     * Specify that the element should be shown only on detail view.
     *
     * @return $this
     */
    public function onlyOnDetail()
    {
        parent::onlyOnDetail();

        return $this->withMeta(['hideWhenCreating' => true, 'hideWhenUpdating' => true]);
    }

    /**
     * Specify that the element should be shown only on forms.
     *
     * @return $this
     */
    public function onlyOnForms()
    {
        parent::onlyOnForms();

        return $this->withMeta(['hideFromDetail' => true]);
    }

    /**
     * Specify that the element should be hidden on forms.
     *
     * @return $this
     */
    public function exceptOnForms()
    {
        parent::exceptOnForms();

        return $this->withMeta(['hideWhenCreating' => true, 'hideWhenUpdating' => true]);
    }

    /**
     * Indicate that the label should be hidden in forms.
     *
     * @return $this
     */
    public function hideLabelInForms()
    {
        return $this->withMeta(['hideLabelInForms' => true]);
    }

    /**
     * Indicate that the label should be hidden in detail view.
     *
     * @return $this
     */
    public function hideLabelInDetail()
    {
        return $this->withMeta(['hideLabelInDetail' => true]);
    }

    /**
     * Sets the input placeholder
     *
     * @param  string  $placeholder
     * @return $this
     */
    public function placeholder($placeholder)
    {
        return $this->withMeta(['placeholder' => $placeholder]);
    }

    /**
     * Set the input as disabled.
     *
     * @return $this
     */
    public function readOnly($callback = null)
    {
        if (!$callback || (is_callable($callback) && call_user_func($callback))) {
            return $this->withMeta(['readOnly' => true]);
        }
        return $this;
    }

    /**
     * Set the input as disabled on create view.
     *
     * @return $this
     */
    public function readOnlyOnCreate()
    {
        return $this->withMeta(['readOnlyOnCreate' => true]);
    }

    /**
     * Set the input as disabled on update view.
     *
     * @return $this
     */
    public function readOnlyOnUpdate()
    {
        return $this->withMeta(['readOnlyOnUpdate' => true]);
    }

    /**
     * Show or hide the field based on other field value
     *
     * @param  array  $field
     * @return $this
     */
    public function onlyWhen($field)
    {
        return $this->withMeta(['onlyWhen' => $field]);
    }

    /**
     * Overriding the base method in order to grab the model ID.
     *
     * @param mixed  $resource  The resource class
     * @param string $attribute The attribute of the resource
     *
     * @return mixed
     */
    protected function resolveAttribute($resource, $attribute)
    {
        $this->setResourceId(data_get($resource, 'id'));
        return parent::resolveAttribute($resource, $attribute);
    }
    /**
     * Sets the
     *
     * @param mixed $id The ID of the resource model. Also sets the base URL based on the Nova config
     *
     * @return void
     */
    protected function setResourceId($id)
    {
        $path = Config::get('nova.path');
        // If the path is the site route, prevent a double-slash
        if ('/' === $path) {
            $path = '';
        }
        return $this->withMeta(['id' => $id, 'nova_path' => $path]);
    }

    /**
     * Dynamically add or remove classes.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        preg_match('/(add|remove)(.+)/', $method, $matches);

        if (count($matches) != 3) {
            return parent::__call($method, $parameters);
        }

        $action = $matches[1];
        $property =  Str::camel($matches[2]);
        $classes = $parameters[0];

        if (!property_exists($this, $property)) {
            return $this;
        }

        if ($action === 'add') {
            $this->$property = "{$this->$property} {$classes}";
        }

        if ($action === 'remove') {
            $this->$property = str_replace(preg_split('/[\s,]+/', $classes), '', $this->$property);
        }

        return $this;
    }

    /**
     * Get additional meta information to merge with the element payload.
     *
     * @return array
     */
    public function meta()
    {
        return array_merge([
            'wrapperClasses' => $this->wrapperClasses,
            'indexClasses' => $this->indexClasses,
            'inputClasses' => $this->inputClasses,
            'fieldClasses' => $this->fieldClasses,
            'labelClasses' => $this->labelClasses,
            'panelLabelClasses' => $this->panelLabelClasses,
            'panelFieldClasses' => $this->panelFieldClasses,
            'panelWrapperClasses' => $this->panelWrapperClasses,
            'indexLinkClasses' => $this->indexLinkClasses,
            'excerptClasses' => $this->excerptClasses,
        ], $this->meta);
    }
}
