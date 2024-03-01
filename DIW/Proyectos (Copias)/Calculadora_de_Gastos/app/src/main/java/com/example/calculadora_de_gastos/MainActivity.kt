package com.example.calculadora_de_gastos

import android.annotation.SuppressLint
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import com.example.calculadora_de_gastos.ui.theme.Calculadora_de_GastosTheme

class MainActivity : ComponentActivity() {

    @SuppressLint("SetTextI18n")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        val precio_gasto = findViewById<EditText>(R.id.precio_gasto)
        val descripcion_gasto = findViewById<EditText>(R.id.descripcion_gasto)
        val boton_agregar = findViewById<Button>(R.id.boton_agregar)
        val numero_gastos = findViewById<TextView>(R.id.numero_gastos)
        val datos_array = findViewById<TextView>(R.id.datos_array)

        var suma_gastos = 0.0

        var array_gastos = ArrayList<Gasto>()

        boton_agregar.setOnClickListener() {

            if (precio_gasto.text.toString() == "") {
                Toast.makeText(this, "Debes escribir un precio válido", Toast.LENGTH_LONG).show()
            } else if (descripcion_gasto.text.toString() == "") {
                Toast.makeText(this, "Debes escribir una descripción", Toast.LENGTH_LONG).show()
            } else {

                val nuevo_gasto: Float = (precio_gasto.text.toString()).toFloat() // Guardar el precio del gasto escrito en el EditText

                // Toast.makeText(this, "Nuevo gasto: $nuevo_gasto", Toast.LENGTH_LONG).show()

                suma_gastos += nuevo_gasto // Sumar a la suma total el gasto
                numero_gastos.text = "$suma_gastos"  // Cambiar el texto del TextView por el nuevo total

                // Añadir al array un nuevo objeto de tipo gasto con los datos escritos en las TextViews
                array_gastos += (Gasto((precio_gasto.text.toString()).toFloat(), descripcion_gasto.text.toString()))

                // Log.i("ARRAY", "$array_gastos")

            }

            var mostrar_array = array_gastos.joinToString("\n")
            datos_array.text = mostrar_array

        }

    }
}