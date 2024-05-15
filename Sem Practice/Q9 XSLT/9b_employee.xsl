<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/employees">
        <html>
            <head>
                <title>9b_employee.xsl</title>
                <style>                    
                    .high{
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <table border="1px">
                    <tr>
                        <th>Name</th>
                        <th>Job-Title</th>
                        <th>Salary</th>
                    </tr>
                    <xsl:apply-templates select="employee"/>
                </table>
            </body>
        </html>
    </xsl:template>
    <xsl:template match="employee">
        <tr>
            <xsl:choose>
                <xsl:when test="salary &gt;=50000">
                    <xsl:attribute name="class">high</xsl:attribute>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:attribute name="class">low</xsl:attribute>
                </xsl:otherwise>
            </xsl:choose>
            <td><xsl:value-of select="name"/></td>
            <td><xsl:value-of select="title"/></td>
            <td><xsl:value-of select="salary"/></td>
        </tr>        
    </xsl:template>
</xsl:stylesheet>
