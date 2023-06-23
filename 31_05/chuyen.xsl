<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
	<HTML>
				<H1>DANH SACH GIAO VIEN NU</H1>
	<Table border="1">
	<xsl:for-each select="/QLGV/Giaovien[Gioitinh='Nu']">
	<TR>
		<TD>
	<xsl:value-of select="MaGV"/>
		</TD>
	<TD>
		<xsl:value-of select="Hoten"/>
	</TD>
	<TD>
		<xsl:value-of select="Gioitinh"/>
		</TD>
	</TR>
		</xsl:for-each>
	</Table>
	</HTML>
</xsl:template>
</xsl:stylesheet>
