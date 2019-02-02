# SpinupWP Composer Site

This is a WordPress site setup using Composer that is primed and ready to be hosted using [SpinupWP](https://spinupwp.com/).

Inspired by Root's Bedrock and other Composer based setups.

## Requirements

* PHP >= 7.1
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

## Installation

1. Create a new project: 
    ```sh
    $ composer create-project deliciousbrains/spinupwp-composer-site
    ```
2. Update environment variables in the `.env` file:
  * `DB_NAME` - Database name
  * `DB_USER` - Database user
  * `DB_PASSWORD` - Database password
  * `DB_HOST` - Database host
  * `WP_ENV` - Set to environment (`development`, `staging`, `production`)
  * `WP_HOME` - Full URL to WordPress home (https://mysite.com)
  * `WP_SITEURL` - Full URL to WordPress including subdirectory (https://mysite.com/wp)
3. Add theme(s) in `public/content/themes/` as you would for a normal WordPress site
4. Set the document root in SpinupWP's server settings to `/public`. 
5. Access WordPress admin at `https://mysite.com/wp/wp-admin/`



