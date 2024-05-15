<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/products">
        <html>
            <head>
                <title>9a_product.xsl</title>
                <style>
                    .Not-Available{
                        background-color: red;
                    }
                    .Available{
                        background-color: green;
                    }
                </style>
            </head>
            <body>
                <table border="1px">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Availability</th>
                    </tr>
                    <xsl:apply-templates select="product"/>
                </table>
            </body>
        </html>
    </xsl:template>
    <xsl:template match="product">
        <tr>
            <xsl:choose>
                <xsl:when test="availability='No'">
                    <xsl:attribute name="class">Not-Available</xsl:attribute>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:attribute name="class">Available</xsl:attribute>
                </xsl:otherwise>
            </xsl:choose>            
            <td><xsl:value-of select="name"/></td>
            <td><xsl:value-of select="price"/></td>
            <td><xsl:value-of select="availability"/></td>
        </tr>
    </xsl:template>
</xsl:stylesheet>
