<%-- 
    Document   : newjsp
    Created on : Apr 11, 2024, 10:25:04 PM
    Author     : VISHWA
--%>

<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Country Information</title>
    <style>
        .top-population {
            background-color: red;
        }
    </style>
</head>
<body>
    <h2>Country Information</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Capital</th>
            <th>Currency</th>
            <th>Population</th>
        </tr>
        <c:forEach var="country" items="${countries}" varStatus="loop">
            <tr class="<c:if test="${country.population>=top}">top-population</c:if>">
                <td>${country.name}</td>
                <td>${country.capital}</td>
                <td>${country.currency}</td>
                <td>${country.population}</td>
            </tr>
        </c:forEach>
    </table>
</body>
</html>