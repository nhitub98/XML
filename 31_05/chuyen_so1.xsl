<?xml version="1.0"?>
<xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="text"/>
<xsl:template match="/">
<xsl:variable name="a" select="/GOC/SO[1]/@Gia_tri"/>
<xsl:variable name="b" select="/GOC/SO[2]/@Gia_tri"/>
<xsl:if test="$a=0">
<xsl:if test="$b=0">
Phuong trinh vo nghiem </xsl:if>
<xsl:if test="$b!=0">
Phuong trinh vo nghiem </xsl:if>
</xsl:if>
<xsl:if test="$a!=0">
PT co nghiem duy nhat x=<xsl:value-of select="-$b div $a"/>
</xsl:if>
</xsl:template>
</xsl:stylesheet>
