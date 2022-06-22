<?php
// PHP program to print
// diamond shape with
// 2n rows
 
// Prints diamond $
// pattern with 2n rows
function printDiamond($n)
{
    $space = $n - 1;
 
    // run loop (parent loop)
    // till number of rows
    for ($i = 0; $i < $n; $i++)
    {
         
        // loop for initially space,
        // before star printing
        for ($j = 0;$j < $space; $j++)
            printf("&nbsp ");
 
        // Print i+1 stars
        for ($j = 0;$j <= $i; $j++){
            printf("* &nbsp");
            
        }
         
 
        echo"<br/>";
        $space--;
    }
 
    // Repeat again in
    // reverse order
    $space = 0;
 
    // run loop (parent loop)
    // till number of rows
    for ($i = $n-1; $i > 0; $i--)
    { 
         
        // loop for initially space,
        // before star printing
        for ($j = 0; $j <= $space; $j++)
            printf("&nbsp ");
 
        // Pr$i stars
        for ($j = 0;$j < $i;$j++)
            {printf("* &nbsp");
 }
        echo"<br/>";
        $space++;
    }
}
 
    // Driver code
    printDiamond(5);
 
// This code is contributed by Anuj_67
?>