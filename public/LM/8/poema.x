<?xml version="1.0" encoding="UTF-8"?>
<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema" elementFormDefault="qualified">
  <xs:element name="Poemas">
    <xs:complexType>
      <xs:sequence>
        <xs:element ref="poema"/>
      </xs:sequence>
    </xs:complexType>
  </xs:element>
  <xs:element name="poema">
    <xs:complexType>
      <xs:sequence>
        <xs:element name="titulo" type="xs:string"/>
        <xs:element ref="autor"/>
        <xs:element name="estilo" type="xs:string"/>
        <xs:element name="movimiento" type="xs:string"/>
        <xs:element ref="estrofas"/>
      </xs:sequence>
    </xs:complexType>
  </xs:element>
  <xs:element name="autor">
    <xs:complexType mixed="true">
      <xs:attribute name="fecha_muerte" type="xs:string" use="required"/>
      <xs:attribute name="fecha_nacimiento" type="xs:string" use="required"/>
    </xs:complexType>
  </xs:element>
  <xs:element name="estrofas">
    <xs:complexType>
      <xs:sequence>
        <xs:element ref="estrofa"/>
      </xs:sequence>
    </xs:complexType>
  </xs:element>
  <xs:element name="estrofa">
    <xs:complexType>
      <xs:sequence>
        <xs:element ref="linea" maxOccurs="unbounded"/>
      </xs:sequence>
      <xs:attribute name="numero" type="xs:string" use="required"/>
    </xs:complexType>
  </xs:element>
  <xs:element name="linea">
    <xs:complexType mixed="true">
      <xs:attribute name="numero" type="xs:string" use="required"/>
    </xs:complexType>
  </xs:element>
</xs:schema>
