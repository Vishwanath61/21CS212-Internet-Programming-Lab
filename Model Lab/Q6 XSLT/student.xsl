<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/students">
        <html>
            <head>
                <title>student.xsl</title>
                <style>
                    .pass{
                        background-color: green;
                    }
                    .fail{
                        background-color: red;
                    }                    
                </style>
            </head>
            <body>
                <table border="1px">
                    <tr>
                        <th>Roll no</th>
                        <th>Name</th>
                        <th>Subject 1</th>
                        <th>Subject 2</th>
                        <th>Subject 3</th>
                    </tr>
                    <xsl:apply-templates select="student"/>
                </table>
            </body>
        </html>
    </xsl:template>    
    <xsl:template match="student">
        <tr>
            <xsl:choose>
                <xsl:when test="sub1 &gt;=50 and sub2 &gt;=50 and sub3 &gt;=50">
                    <xsl:attribute name="class">pass</xsl:attribute>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:attribute name="class">fail</xsl:attribute>
                </xsl:otherwise>
            </xsl:choose>                     
            <td><xsl:value-of select="rollno"/></td>
            <td><xsl:value-of select="name"/></td>
            <td><xsl:value-of select="sub1"/></td>
            <td><xsl:value-of select="sub2"/></td>
            <td><xsl:value-of select="sub3"/></td>
        </tr>
    </xsl:template>
</xsl:stylesheet>
