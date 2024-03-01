package com.example.calculadora_de_gastos

class Gasto (val gasto: Float, val descripcion: String) {
    override fun toString(): String {
        return "Gasto: $gasto - Descripción: $descripcion"
    }

}