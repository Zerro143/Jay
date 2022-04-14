<html>
    <body>
    
    <?php
        //The example below shows how to use the simplexml_load_file() function to read XML data from a file:
        $xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
        print_r($xml);
    ?>
    <br>
    <br>
    <?php
        #Get the node values from the "note.xml" file:
        $xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
        echo $xml->to . "<br>";
        echo $xml->from . "<br>";
        echo $xml->heading . "<br>";
        echo $xml->body  ."<br>";
    ?>
    <br>
    <?php
        #The following example gets the node value of the <title> element in the Second and First <book> elements in the "books.xml" file: 
        $xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
        echo $xml->book[1]->title . "<br>";
        echo $xml->book[0]->title;
    ?>
    <br><br>
    <?php
        #The following example loops through all the <book> elements in the "books.xml" file, and gets the node values of the <title>, <author>, <year>, and <price> elements:
        
        #The children() function finds the children of a specified node.
        foreach($xml->children() as $books) {
          echo $books->title . ", ";
          echo $books->author . ", ";
          echo $books->year . ", ";
          echo $books->price . "<br>";
        }
    ?>
    <br><br>
    <?php
        #The following example gets the attribute values of the <title> elements in the "books.xml" file:
        foreach($xml->children() as $books) {
          echo $books->title['lang'];
          echo "<br>";
        }
    ?>

    </body>
</html>