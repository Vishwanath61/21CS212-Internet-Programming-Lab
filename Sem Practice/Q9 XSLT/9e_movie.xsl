<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/movies">
        <html>
            <head>
                <title>9e_movie.xsl</title>
                <style>
                    .good{
                        background-color: yellow;
                    }
                </style>
            </head>
            <body>
                <table border="1px">
                    <tr>
                        <th>Title</th>
                        <th>Director</th>
                        <th>Rating</th>
                    </tr>
                    <xsl:apply-templates select="movie"/>
                </table>
            </body>
        </html>
    </xsl:template>
    <xsl:template match="movie">
        <tr>
            <xsl:choose>
                <xsl:when test="rating &gt;= 8">
                    <xsl:attribute name="class">good</xsl:attribute>
                </xsl:when>
            </xsl:choose>
            <td><xsl:value-of select="title"/></td>
            <td><xsl:value-of select="director"/></td>
            <td><xsl:value-of select="rating"/></td>
        </tr>
    </xsl:template>
</xsl:stylesheet>
