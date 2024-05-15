<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/students">
        <html>
            <head>
                <title>9c_student.xsl</title>
            </head>
            <style>
                .fail{
                    background-color: red;
                }
            </style>
            <body>
                <table border="1px">
                    <tr>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>GPA</th>
                    </tr>
                    <xsl:apply-templates select="student"/>
                </table>
            </body>
        </html>
    </xsl:template>
    <xsl:template match="student">                
        <tr>          
            <xsl:choose>
                <xsl:when test="gpa&lt;=5.00">
                    <xsl:attribute name="class">fail</xsl:attribute>
                </xsl:when>
            </xsl:choose> 
            <td><xsl:value-of select="name"/></td>
            <td><xsl:value-of select="grade"/></td>
            <td><xsl:value-of select="gpa"/></td>
        </tr>
    </xsl:template>
</xsl:stylesheet>
