<?xml version="1.0"?>
<xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
    <h1>Danh sach san pham</h1>
    <table border="1">
    <xsl:for-each select="/productdata/product">
    <xsl:sort select="soluong" data-type="number" order="descending"/>
      <TR>
        <TD>
        <xsl:value-of select="@productID"/>
        </TD>
        <TD>
        <xsl:value-of select="ten"/>
        </TD>
        <TD>
        <xsl:value-of select="mota"/>
        </TD>
        <TD>
        <xsl:if test="gia &gt;30000">

        <font color="red">
        <xsl:value-of select="gia"/>

        </font>
        </xsl:if>

        </TD>
        <TD>
        <xsl:value-of select="soluong"/>
        </TD>
      </TR>
    </xsl:for-each>
    </table>
  </html>
</xsl:template>
</xsl:stylesheet>
