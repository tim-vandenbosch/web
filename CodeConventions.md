# Code conventions

- MAP: localhost/project
- SITE: fairytickets.pxl.be

## Bekendmaking in commentaar
	/**
	 * Gebruiker: Naam
	 * Datum: dd/mm/yyyy
	 * Bron: none of bron zetten
	*/
## Edit van code
	/**
	 * Edit: 
	 * Gebruiker: Naam
	 * Datum: dd/mm/yyyy
	 * Bron: none of bron zetten
	*/

## Algemene regels

  - Inspringen
  - 1 lege lijn na een blok
  - Keywords (true, false,...) kleine letters
  - Variabele declaratie: camelcasing, _, begint met kleine letter
      ditIsEenVoorbeeld1
  - Klasses beginnen met een hoofdletter
  - Methodes beginnen met een kleine letter

## Spaties
  - No: `$a=$b+$c;`

  - Yes: `$a = $b + $c;`
    
  - spatie bij parameters: `$a = getFoo( $b );`
    
  - geen spatie bij geen paramater: `$c = getBar();`
    
  - Bij iteraties en catch:
    - Yes
      `if(isFoo()) { $a = 'foo'; }`
    - No
      `if(isFoo()) { $a = 'foo'; }`
      
  - Geen spaties bij commentaar: 
    // dit: is een goed voorbeeld
    //dit is geen goed voorbeeld (geen spatie bij begin) 
