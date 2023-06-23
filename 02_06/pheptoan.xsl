<?xml version="1.0"?>
<xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method ="text"/>
<xsl:template match="/" >
<xsl:variable name = "a" select="/Pheptoan/So1"/>
<xsl:variable name = "b" select="/Pheptoan/So2"/>
<xsl:variable name = "pt" select="/Pheptoan/PT"/>
<xsl:choose>
<xsl:when test="$pt='+'">   
         Tong:  <xsl:value-of select = "$a + $b"/>    
</xsl:when>

 <xsl:when test="$pt='-'" >        
        Hieu: <xsl:value-of select = "$a - $b"/>   
</xsl:when>
          
<xsl:when test="$pt='*'" >  
          Tich: <xsl:value-of select = "$a * $b"/>  
</xsl:when>

<xsl:when test="$pt='/'" > 
          Thuong: <xsl:value-of select = "$a div $b"/>     
</xsl:when>
        
<xsl:otherwise >  Phep toan khong hop le </xsl:otherwise>
</xsl:choose></xsl:template>


</xsl:stylesheet>
