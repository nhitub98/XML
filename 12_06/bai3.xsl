<?xml version="1.0"?>
<xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns="http://www.w3.org/TR/REC-html40">

<xsl:template match="/">
<xsl:variable name="nam" select="/Tinhngay/nam"/>
<xsl:variable name="thang" select="/Tinhngay/thang"/>

<xsl:choose>
<xsl:when test="$thang='1' or $thang='3' or $thang='5' or $thang='7' or $thang='8' or $thang='10' or $thang='12'">   
         Thang co 31 ngay   
</xsl:when>
       
<xsl:when test="$thang='4' or $thang='6' or $thang='9'or $thang='11'">   
         Thang co 30 ngay   
</xsl:when>
         
<xsl:when test="$thang='2'">   
<xsl:if test="$nam mod 4='0'" >
Thang co 29 ngay  
</xsl:if>
<xsl:if test="$nam mod 4!='0'" >
 Thang co 28 ngay   
 </xsl:if>
	</xsl:when>
        <xsl:otherwise>Thang nhap vao khong hop le</xsl:otherwise>
</xsl:choose>
</xsl:template>
</xsl:stylesheet>
