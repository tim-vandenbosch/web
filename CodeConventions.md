# Code conventions

- MAP: localhost/project
- SITE: fairytickets.pxl.be
## Algemene regels

  - Inspringen
  - 1 lege lijn na een blok
  - Keywords (true, false,...) kleine letters
  - Variabele declaratie: camelcasing, _, begint met kleine letter
      ditIsEenVoorbeeld1
  - Klasses beginnen met een hoofdletter
  - Methodes beginnen met een kleine letter

## Spaties
  - No:
    $a=$b+$c;

  - Yes:
    $a = $b + $c;
    
  - spatie bij parameters
    $a = getFoo( $b );
    
  - geen spatie bij geen paramater
    $c = getBar();
    
  - Bij iteraties en catch
    - yes
      if ( isFoo() ) {
    	$a = 'foo';
      }
    
    - No
      if( isFoo() ) {
    	$a = 'foo';
      }
