<?xml version="1.0"?>
<xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="text"/>
<xsl:template match="/">
<xsl:variable name = "a" select="/Timmax/So1"/>
<xsl:variable name = "b" select="/Timmax/So2"/>
<xsl:variable name = "c" select="/Timmax/So3"/>
<xsl:if test="$a &gt;= $b and $a &gt;= $c"> 
So lon nhat la:  
<xsl:value-of select = "$a"/>    
</xsl:if>

 <xsl:if test="$b &gt;= $a and $b &gt;= $c">        
So lon nhat la: <xsl:value-of select = "$b"/>   
</xsl:if>
          
<xsl:if test="$c &gt;= $a and $c &gt;= $b">  
So lon nhat la: <xsl:value-of select = "$c"/>  

</xsl:if>
</xsl:template>
</xsl:stylesheet>
