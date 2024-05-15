<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/products">
        <html>
            <head>
                <title>9d_product2.xsl</title>
                <style>
                    .yes{
                        background-color: green;
                    }
                </style>
            </head>
            <body>
                <table border="1px">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discounted Price</th>
                    </tr>
                    <xsl:apply-templates select="product"/>
                </table>
            </body>
        </html>
    </xsl:template>
    <xsl:template match="product">  
        <tr>
            <td><xsl:value-of select="name"/></td>
            <td><xsl:value-of select="price"/></td>
            <td>
                <xsl:choose>
                    <xsl:when test="discounted-price">
                        <xsl:attribute name="class">yes</xsl:attribute>
                        <xsl:value-of select="discounted-price"/>
                    </xsl:when>
                    <xsl:otherwise>
                        -
                    </xsl:otherwise>
                </xsl:choose> 
            </td>           
        </tr>
    </xsl:template>
</xsl:stylesheet>
