# gsDashmixPlugin

The `gsDashmixPlugin` is a symfony plugin that provides an implementation of 
Dashmix Theme - https://demo.pixelcave.com/dashmix/

* Is connected with `sfDoctrineGuardPlugin` for authentication.
* It allows you to show Success and Error user messages.
* It contains a menu implementation which gives you the posibility to assign menus by credential.

## Installation ##

  * Install the plugin (via composer)

        composer require dvillarraga/gs-dashmix-plugin

  * Activate the plugin in the `config/ProjectConfiguration.class.php`

      ```php
      class ProjectConfiguration extends sfProjectConfiguration
      {
        public function setup()
        {
          $this->enablePlugins(array(
            'sfDoctrinePlugin',
            'gsDashmixPlugin',
            '...'
          ));
        }
      }
      ```

    * Copy Dashmix sources to web folder, by default is /assets

    ```bash

    $ cp -R ~/Downloads/DashmixTheme/assets ~/Projects/mysfProject/web/

    ```

    * Copy or use our symfony template to create yours.

    ```bash

    $ cp plugins/gsDashmixPlugin/templates/dashmix_public.php apps/frontend/templates/

    ```

    * Configure paths and names in app.yml

              all:
                sf_guard_plugin:
                    signin_form: gsDashmixFormSignin
                gs_dashmix_plugin:
                    url: 'https://myurl.com'
                    project_title: 'Your project title'
                    theme_files: '/assets/'
                    
                    icon_shortcut_icon: '/assets/favicon.png'
                    icon_icon: '/assets/favicon-192x192.png'
                    icon_apple_touch_icon: '/assets/apple-touch-icon-180x180.png'
                    
                    login_title: 'Authentication'
                    login_background_image: '/public/media/photos/photo14.jpg'
                    login_logo: '/public/logo.png'

  * Clear you cache

        symfony cc

## Help and docs

Please feel free to contact me. You also can [tweet @dvillarraga](http://twitter.com/dvillarraga)!

