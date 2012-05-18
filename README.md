phasite - PHP Fast Site
=======================

A basic PHP boot strap framework for building small and simple websites.

### Features include:

- Global `YML` configurations
- PHP _only_ templating system
  - Includes Master Pages, Templates, Partials
  - Supports "block" rendering (similar to Smarty, Twig, ASP.NET)
  - A single `model` variable is passed to each template
- Support for multiple controllers and actions
  - Base `Controller` class is extendable for custom controllers
- Configuration based routing to match urls to controller/action
- Multi-language
  - Cookie support
  - Navigation urls support
  - All labels (strings) in language specific configuration
- Basic XML repository for page data

### What **phasite** is NOT:

- Not a CMS
- Does not currently support MVC style routing
- Does not have IoC components that are easily swappable
- Does not easily support "plugins", it is meant to be hacked and customized for each application

### Who its for:

- Looking to quicklky build a small, custom website 
- Do not want to be limited to a CMS platform
- Do not want to learn or setup larger frameworks (Symfony, CakePHP etc)
- Need to build multiple custom features for parts of the site
- Template developer doesn't need to know about underlying system or learn a new template language.