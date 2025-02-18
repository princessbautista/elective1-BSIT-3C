<?php

namespace App\Http\Controllers; //ginamit ang namespace para sa controller para nasa directory na 'App\Http\Controllers' 

use Illuminate\Http\Request; // ini-import ang request class, pero pwede itong tanggalin kasi hindi nagagamit sa code

class MathController extends Controller
{
    public function calculate($operation, $num1, $num2) //function para tumanggap ng operation and input na dalawang number
    {
      
        $num1 = (int) $num1; //kino-convert ang unang number mula string to integer
        $num2 = (int) $num2; //kino-convert ang pangalawang number mula string to integer

       
        if ($operation === 'divide' && $num2 == 0) { //tinitignan kung ang operation ay division at kung ang pangalawang number ay 0 para maiwasan ang error
            return "<p style='color: red; font-weight: bold;'>Cannot divide by zero</p>"; // nag di-display ng error message kung hindi pwedeng i divide sa 0
        }

      
        switch ($operation) { //switch operation para malaman kung anong operation ang gagamitin
            case 'add':
                $result = $num1 + $num2; // nag a-add ng dalawang number
                break;
            case 'subtract':
                $result = $num1 - $num2; // nag babawas ng pangalawang number mula sa unang number
                break;
            case 'multiply':
                $result = $num1 * $num2; // nag mu-multiply ng dalawang number
                break;
            case 'divide':
                $result = $num1 / $num2; //  nag di-divide ng dalawang number
                break;
            default:
                return "<p style='color: red; font-weight: bold;'>Invalid operation</p>"; // nag papakita ng error message kung ang operation ay mali
        }

       
        $bgColor = ($result % 2 === 0) ? 'green' : 'green'; // pinapakita na ang ilalabas ay green kung ang result ay even, at green ulit kung odd
        $textColor1 = ($num1 % 2 !== 0) ? 'blue' : 'orange'; // pinapakita na ang ilalabas ay blue kung ang unang input ay odd, at orange kapag even
        $textColor2 = ($num2 % 2 !== 0) ? 'blue' : 'orange'; // pinapakita na ang ilalabas ay blue kung ang pangalwang input ay odd, at orange kapag even


        //<p>URL: http://domain/$operation/$num1/$num2</p> -> ipinapakita ang URL pati mga kasamang operation and number
        //<p>Value 1: <span style='color: $textColor1;'>$num1</span></p> -> ipapakita ang unang number na may kulay depende kung odd o even
        // <span style='background-color: $bgColor; padding: 5px; border: 1px solid black;'>$result</span></p> -> ipapakita ang result ng operation na may background color na green kung odd o even
                
        return "<div style='padding: 20px; text-align: left;'>
                    <p>URL: http://domain/$operation/$num1/$num2</p> 
                    <p>Value 1: <span style='color: $textColor1;'>$num1</span></p> 
                    <p>Value 2: <span style='color: $textColor2;'>$num2</span></p> 
                    <p>Operator: $operation</p>
                    <p><strong style='color: green;'>Result (Displayed in Green):</strong>
                        <span style='background-color: $bgColor; padding: 5px; border: 1px solid black;'>$result</span></p> 
                         </div>";
    }
}



