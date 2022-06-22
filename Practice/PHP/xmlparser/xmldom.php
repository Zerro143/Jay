<?php
    #The example above creates a DOMDocument-Object and loads the XML from "note.xml" into it.
    #Then the saveXML() function puts the internal XML document into a string, so we can output it.                                                                                                                                                                    

    $xmlDoc = new DOMDocument();
    $xmlDoc->load("note.xml");

    print $xmlDoc->saveXML()."<br>";
    
    #We want to initialize the XML parser, load the XML, and loop through all elements of the <note> element:
    $x = $xmlDoc->documentElement;
    foreach ($x->childNodes AS $item) {
      print $item->nodeName . " = " . $item->nodeValue . "<br>";
    }
?>