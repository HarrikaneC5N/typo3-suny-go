Remplacer nomSite (le dossier) par le nom de votre projet

-- ext_emconf.php --
Ce fichier sert (entre autre) à installer des extension existantes sur le TER ou non(e_maps, e_news...)
Si vous voulez installer une extension "maison" à l'installation de e_magineurs, copiez l'extension dans e_magineurs\Initialisation\ et ajoutez une ligne dans 'depends', ou ajoutez la à la main ultérieurement.
Si vous n'avez pas besoin de toutes les extensions, supprimez la ligne !
Exemple 'e_cache' => '0.0.1-0.0.0',
explication : 'nomDelExtension' => 'version minimale souhaitée-0.0.0'. Le 0.0.0 sert à récupérer la dernier version du TER

Solr est placé dans suggest, il ne sera pas installé automatiquement à l'installation de e_magineurs

-- ext_tables.php --
Modifiez les lignes 9,10,15,16 par le nom du dossier et le nom du projet

-- ext_localconf.php --
Modifiez 'nomSite' la ligne 7
['nomSite'] est le nom de la conf qui sera appelé en TSConfig

-- TSConfig -- 
Dans nomSite/Configuration/TSConfig/tsconfig.txt modifiez 'nomSite' par le nom indiqué dans le fichier ext_localconf.php

-- RTE --
Dans nomSite/Configuration/RTE/rte.yaml modifiez le chemin vers le fichier css du rte : contentsCss ligne 13 

-- Typoscript --
Dans nomSite/Configuration/Typoscript/setup.txt et nomSite/Configuration/Typoscript/constants.txt modifiez 'nomSite' par le nom de votre dossier
Dans nomSite/Configuration/TypoScript/general/configuration_generale.cst modifiez les constantes 'dossierPublic', 'dossierPrivate', 'dossierExtensions', 'dossierContainer', 'siteTitle'
Dans nomSite/Configuration/TypoScript/general/configuration_generale.stp modifiez 'nomSite' par le nom de votre dossier dans l'appel js de tarte au citron (ligne 34)


-- Javascript --
Dans nomSite/Resources/Public/JavaScript/scripts.js Modifiez le chemin du dossier Public dans le fichier (ligne 160)
Dans nomSite/Resources/Public/accessibilite/accessibilite.js Modifiez le chemin du dossier Public dans le fichier (ligne 34)

-- Epackage --
Récupérer e_package depuis http://git-love.e-magineurs.com/Extensions/e_package et copier les fichiers dans e_magineurs/Initialisation/Extensions/e_package

*******************************************************************************************
!!!!! METTRE À JOUR LA LISTE DES EXTENSIONS DANS L'EXTENSION MANAGER AVANT INSTALLATION !!!
!!!!! METTRE À JOUR LA LISTE DES EXTENSIONS DANS L'EXTENSION MANAGER AVANT INSTALLATION !!!
!!!!! METTRE À JOUR LA LISTE DES EXTENSIONS DANS L'EXTENSION MANAGER AVANT INSTALLATION !!!
!!!!! METTRE À JOUR LA LISTE DES EXTENSIONS DANS L'EXTENSION MANAGER AVANT INSTALLATION !!!
!!!!! METTRE À JOUR LA LISTE DES EXTENSIONS DANS L'EXTENSION MANAGER AVANT INSTALLATION !!!
!!!!! METTRE À JOUR LA LISTE DES EXTENSIONS DANS L'EXTENSION MANAGER AVANT INSTALLATION !!!
*******************************************************************************************

Installez e_magineurs via l'extension manager
Videz les caches de la mort

-- BDD --
Après l'installation, vous pouvez supprimer toute votre BDD locale est importer e_magineurs/Initialisation/
login : adminpackage
mdp : bienvenueDansLeMerveilleuxMondeDeTypo3
Renommer ce compte avec un nom d'utilisateur et un mot de passe sécurisé !
!!ATTENTION!! Pour ne pas à avoir à modifier la conf de linkhandler/sitemap, DEPLACER les rubriques "Actualités", "Agenda", "Galerie photos" et "Galerie vidéos" de la rubrique "Exemple de contenus"

Pensez à ajouter l’adresse mail du projet à la tache report et finaliser la conf de la tache image_autoresize (il suffit d'éditer puis d'enregistrer la conf de l'extensin manager)

-- Site configuration -- 
Vider les caches + Dump autoload dans installtool
Créer le site configuration (renseigner nom dossier + langue)
Récupérer le reste de la configuration ici (Attention à respecter les espaces sinon ça ne marche pas) + changer le domaine en backend : 

routeEnhancers:
  NewsPlugin:
    type: Extbase
    limitToPages: null
    extension: News
    plugin: Pi1
    routes:
      -
        routePath: '/page/{page}'
        _controller: 'News::list'
        _arguments:
          page: '@widget_0/currentPage'
      -
        routePath: '/tag/{tag_name}'
        _controller: 'News::list'
        _arguments:
          tag_name: overwriteDemand/tags
      -
        routePath: '/{news_title}'
        _controller: 'News::detail'
        _arguments:
          news_title: news
      -
        routePath: '/archive/{year}/{month}'
        _controller: 'News::archive'
    defaultController: 'News::list'
    aspects:
      news_title:
        type: PersistedAliasMapper
        tableName: tx_news_domain_model_news
        routeFieldName: path_segment
      page:
        type: StaticRangeMapper
        start: '1'
        end: '100'
    defaults:
      page: '0'
    requirements:
      page: \d+
  AnnuairePlugin:
    type: Extbase
    limitToPages: null
    extension: EAnnuaires
    plugin: Pi1
    routes:
      -
        routePath: '/{fiche_title}'
        _controller: 'Fiche::show'
        _arguments:
          fiche_title: fiche
    defaultController: 'Fiche::list'
    aspects:
      fiche_title:
        type: PersistedAliasMapper
        tableName: tx_eannuaires_domain_model_fiche
        routeFieldName: slug
      page:
        type: StaticRangeMapper
        start: '1'
        end: '100'
    defaults:
      page: '0'
    requirements:
      page: \d+
  DpnGlossary:
    type: Extbase
    limitToPages: null
    extension: DpnGlossary
    plugin: glossary
    routes:
      -
        routePath: '/{character}'
        _controller: 'Term::list'
        _arguments:
          character: '@widget_0/character'
      -
        routePath: '/{term_name}'
        _controller: 'Term::show'
        _arguments:
          term_name: term
    defaultController: 'Term::list'
    defaults:
      character: ''
    aspects:
      term_name:
        type: PersistedAliasMapper
        tableName: tx_dpnglossary_domain_model_term
        routeFieldName: url_segment
      character:
        type: StaticMultiRangeMapper
        ranges:
          -
            start: A
            end: Z
  PageTypeSuffix:
    type: PageType
    default: ''
    map:
      flux.rss: 9818
      # aides.rss: 9820
      sitemap.xml: 470955600
      suggest: 7384
      powermail_cond: 3132
      femanager_validation: 1548935210
      femanager_terms: 1548935211
      femanager_confirm: 154893521



-- GABARITS --
Inclure les statics TypoScript dans le gabarti principal du site ET TSconfig dans l'onglet 'Resources' de la page racine du site.
Le static e_package doit être inséré AVANT le static e_magineurs. Ces deux static doivent TOUJOURS être en FIN DE LISTE !!

-- Traduction / l10n --
Il faut télécharger les traductions des extensions sinon vous aurez toujours les textes en anglais
pour ça aller dans ADMIN TOOLS > Maintenance et manager languages, puis télécharger la langue french
en attendant la création auto des dossiers, récupérer le fichier fr.locallang.xlf de e_package/initialisation et le coller dans typo3conf/l10n/fr/e_package/Resources/Private/Language/fr.locallang.xlf



BONUS
-- robots.txt --
Deux fichier robots.txt.DEV et robots.txt.PROD sont présents dans e_package/Initialisation

-- ext_localconf.php --
Un exemple pour ajouter des couleurs dans l'arborescence backend.
Du code commenté si utilisation de fal_securedownload

Un dossier fileadmin/e_magineurs est créé avec des images, pdfs... Pensez à le supprimer après la mise en prod
Pensez à dupliquer le favicon à la racine du site pour qu'il s'affiche lors de l'ouverture de pdf et pour /typo3

-- pagination lazyload --
si vous souhaitez utilisez la paginatin au chargement il faut ajouter la class "lazyLoadContainer" sur le conteneur de la vue liste, la class "lazyLoadItem" sur chaque élément et utiliser la pagination f:widget.paginate
Possibilité de configurer le loader via le fichier paginate.cst d'emagineurs

#############
Ajout d'un nouveau type de menu (exemple avec menu footer) :
############

-- TSCONFIG --
mod.wizards.newContentElement.wizardItems.menu {
    elements.menu_piedpage {
        iconIdentifier = menu_piedpage_icon
        title = Menu pied de page
        description = Menu utilisé dans le pied de page du site
        tt_content_defValues.CType = menu_piedpage
    }
    show := addToList(menu_piedpage)
}

-- TYPOSCRIPT (première ligne à adapter selon les besoins) --
templateName = nom du template fluid situé dans e_magineurs/nomSite/Resources/Extensions/fluid_styled_content/Templates/

tt_content.menu_piedpage =< tt_content.menu_pages
tt_content.menu_piedpage.templateName = MenuFooter

-- TT_CONTENT.php --
ajouter un fichier tt_content.php dans emagineurs/Configuration/TCA/Overrides

<?php
defined('TYPO3_MODE') or die();

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
	    'tt_content',
	    'CType',
	    [
	        'Menu pied de page',
	        'menu_piedpage',
	        'menu_piedpage_icon'
	    ],
	    'menu_sitemap_pages',
	    'after'
	);

	$GLOBALS['TCA']['tt_content']['types']['menu_piedpage'] = $GLOBALS['TCA']['tt_content']['types']['menu_pages'];

Pour ajouter une icone : voir ext_tables.php et ext_localconf.php du package... (ou demander à SOphie ou Micka ;-))

-- AdditionalConfiguration.php --
Si vous utilisez un formulaire de connexion frontend sur le site, pour que les pages à "accès restreint" redirigent sur la page de connexion et non une 404, 
commentez la ligne 77 et décommentez les lignes 81, 83 et 85 en changeant les IDs par rapport à vos pages (404 et login)

Il faudra également rajouter dans le mode de redirection la valeur "Défini par les paramètres GET/POST" afin d'appliquer la redirection vers l'url d'origine après la connexion

