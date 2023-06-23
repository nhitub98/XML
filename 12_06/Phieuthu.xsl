<?xml version="1.0"?>
<xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns="http://www.w3.org/TR/REC-html40">

<xsl:template match="/">
<xsl:variable name="Khachhang" select="/PHIEU_THU/@Khachhang"/>
<xsl:variable name="Dongia" select="/PHIEU_THU/@Dongia"/>
<xsl:variable name="Soluong" select="/PHIEU_THU/@Soluong"/>
<xsl:variable name="Thanhtien" select="/PHIEU_THU/@Thanhtien"/>
<xsl:variable name="Ngay_thu" select="/PHIEU_THU/@Ngay_thu"/>
<xsl:for-each select="/PHIEU_THU">
<html>
PHIEU THU <BR/><BR/>
KHACH HANG: <xsl:value-of select="$Khachhang"/><br/>
DON GIA: <xsl:value-of select="$Dongia"/><br/>
SO LUONG: <xsl:value-of select="$Soluong"/><br/>
THANH TIEN: <xsl:value-of select="$Dongia*$Soluong"/><br/>
NGAY THU: <xsl:value-of select="$Ngay_thu"/><br/>
</html>
</xsl:for-each>
</xsl:template>
</xsl:stylesheet>
