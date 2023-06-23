<?xml version="1.0"?>
<xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<HTML>
So le la
<xsl:for-each select="/Number/SO" >
<xsl:if test="@a mod 2 != '0'">
<BR/><xsl:value-of select="@a"/>
</xsl:if>
</xsl:for-each>
</HTML>
</xsl:template>
</xsl:stylesheet>
