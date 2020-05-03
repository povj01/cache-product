# Cache produktu při requestu
Při zobrazení detailu konkrétního produktu `/produkt/{3}` se vrátí z MySQL databáze nebo ElasticSearch produkt s jeho informacemi.
Pakliže již byl jednou vyhledávan, tak se získá z cache, která se nachází `/var/cache/product_cache.json`. Umístění lze změnit v
nastavení aplikace `.env`. Pro změnu databáze postačí definovat v `config/services.yaml` repozitář pro vyhledávání, **ProductRepositoryMS** nebo **ProductRepositoryES**
Byl nasimulován přístup k ID **produktu 3**. Po každém dotazu se automaticky změní počet **vykonaných dotazů** na konrkétní produkt v **cache paměti**.

## Předpoklady pro spuštění
* nainstalovaný composer
* APACHE
* PHP v 7.4

## Instalace
1. Stáhněte si `repozitář` na lokální zařízení.
2. V rootu, kde se nachází composer spusťte instalaci `composer install`.
3. Zadejte na locale odkaz s id produktem, který chceme vyhledat `localhost/produkt/3`.

## Autor
* **Jurij Povoroznyk** - povoroznykjurij@gmail.com