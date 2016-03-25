# Code conventions

- MAP: localhost/project
- SITE: fairytickets.pxl.be

## Spaties
  // No:
    $a=$b+$c;

  // Yes:
    $a = $b + $c;
    
  //spatie bij parameters
    $a = getFoo( $b );
    
  //geen spatie bij geen paramater
    $c = getBar();
    
  //Bij iteraties en catch
    // yes
      if ( isFoo() ) {
    	$a = 'foo';
      }
    
    // No
      if( isFoo() ) {
    	$a = 'foo';
      }
