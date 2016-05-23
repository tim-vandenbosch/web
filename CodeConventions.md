# Code conventions
## Bekendmaking in commentaar
	/* @author = Naam
	 * Date = dd/mm/yyyy
	 * Bron = link fso
	 * Uitleg functie
	*/
## Edit van code onder aanmaker zetten
	/* @edit = Naam
	 * Date = dd/mm/yyyy
	 * Bron = bron
	 * Uitleg functie
	*/

## Algemene regels

  - Inspringen met tab
  - Keywords grote letters (FALSE, TRUE, ...)
  - Variabele declaratie: camelcasing, _, begint met kleine letter
      ditIsEenVoorbeeld1
  - Klasses beginnen met een hoofdletter
  - Methodes beginnen met een kleine letter

## Spaties
  - No: `$a=$b+$c; $this->load->view('');`

  - Yes: `$a = $b + $c; $this -> load -> view('');`
    
  - geen spatie bij parameters: `$a = getFoo($b);`
    
  - geen spatie bij geen paramater: `$c = getBar();`

  - spaties bij commentaar: 
  	// dit: is een goed voorbeeld
    	//dit is geen goed voorbeeld (geen spatie bij begin) 

  - functies en lussen:
  	function test()
	{
		hier komt code;
	}

## Controllers
  - Geen echo/print
  - Geen SQL

## Models
- geen html

## vieuws
- geen SQL

    
