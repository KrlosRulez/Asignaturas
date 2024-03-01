package com.example.lista_de_la_compra

import android.os.Bundle
import android.view.View
import android.widget.Button
import android.widget.CheckBox
import android.widget.ImageView
import android.widget.RadioButton
import android.widget.RadioGroup
import android.widget.Switch
import android.widget.TextView
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import androidx.core.content.ContextCompat
import com.example.lista_de_la_compra.ui.theme.Lista_de_la_CompraTheme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        var objetos_carrito = 0

        var texto_compra = "Has comprado: "

        // Colores
        val colorRojo = ContextCompat.getColor(this, R.color.red)
        val colorVerde = ContextCompat.getColor(this, R.color.green)
        val colorAzul = ContextCompat.getColor(this, R.color.blue)
        val colorBlanco = ContextCompat.getColor(this, R.color.white)
        val colorNegro = ContextCompat.getColor(this, R.color.black)
        var colorElegido = ContextCompat.getColor(this, R.color.white)

        val radio_group = findViewById<RadioGroup>(R.id.radio_group)

        val special_switch = findViewById<Switch>(R.id.special_switch)

        val check_leche = findViewById<CheckBox>(R.id.check_leche)
        val check_pan = findViewById<CheckBox>(R.id.check_pan)
        val check_manzanas = findViewById<CheckBox>(R.id.check_manzanas)
        val check_pasta = findViewById<CheckBox>(R.id.check_pasta)

        val textview_leche = findViewById<TextView>(R.id.textview_leche)
        val textview_pan = findViewById<TextView>(R.id.textview_pan)
        val textview_manzanas = findViewById<TextView>(R.id.textview_manzanas)
        val textview_pasta = findViewById<TextView>(R.id.textview_pasta)

        val boton_comprar = findViewById<Button>(R.id.boton_comprar)

        val textview_lista = findViewById<TextView>(R.id.textview_lista)

        val imagen_carro = findViewById<ImageView>(R.id.imagen_carro)

        val CosasCompradas = mutableListOf<String>()

        radio_group.setOnCheckedChangeListener { group, checkedId ->

            if (checkedId == -1) {

                colorElegido = colorBlanco

                textview_leche.setBackgroundColor(colorBlanco)
                textview_pan.setBackgroundColor(colorBlanco)
                textview_manzanas.setBackgroundColor(colorBlanco)
                textview_pasta.setBackgroundColor(colorBlanco)

            } else {

                val radio_button = group.findViewById<View>(checkedId) as RadioButton

                when (radio_button.id) {

                    R.id.radio_red -> {

                        colorElegido = colorRojo

                        if (check_leche.isChecked) {
                            textview_leche.setBackgroundColor(colorRojo)
                        } else {
                            textview_leche.setBackgroundColor(colorBlanco)
                        }

                        if (check_pan.isChecked) {
                            textview_pan.setBackgroundColor(colorRojo)
                        } else {
                            textview_pan.setBackgroundColor(colorBlanco)
                        }

                        if (check_manzanas.isChecked) {
                            textview_manzanas.setBackgroundColor(colorRojo)
                        } else {
                            textview_manzanas.setBackgroundColor(colorBlanco)
                        }

                        if (check_pasta.isChecked) {
                            textview_pasta.setBackgroundColor(colorRojo)
                        } else {
                            textview_pasta.setBackgroundColor(colorBlanco)
                        }

                    }

                    R.id.radio_green -> {

                        colorElegido = colorVerde

                        if (check_leche.isChecked) {
                            textview_leche.setBackgroundColor(colorVerde)
                        } else {
                            textview_leche.setBackgroundColor(colorBlanco)
                        }

                        if (check_pan.isChecked) {
                            textview_pan.setBackgroundColor(colorVerde)
                        } else {
                            textview_pan.setBackgroundColor(colorBlanco)
                        }

                        if (check_manzanas.isChecked) {
                            textview_manzanas.setBackgroundColor(colorVerde)
                        } else {
                            textview_manzanas.setBackgroundColor(colorBlanco)
                        }

                        if (check_pasta.isChecked) {
                            textview_pasta.setBackgroundColor(colorVerde)
                        } else {
                            textview_pasta.setBackgroundColor(colorBlanco)
                        }

                    }

                    R.id.radio_blue -> {

                        colorElegido = colorAzul

                        if (check_leche.isChecked) {
                            textview_leche.setBackgroundColor(colorAzul)
                        } else {
                            textview_leche.setBackgroundColor(colorBlanco)
                        }

                        if (check_pan.isChecked) {
                            textview_pan.setBackgroundColor(colorAzul)
                        } else {
                            textview_pan.setBackgroundColor(colorBlanco)
                        }

                        if (check_manzanas.isChecked) {
                            textview_manzanas.setBackgroundColor(colorAzul)
                        } else {
                            textview_manzanas.setBackgroundColor(colorBlanco)
                        }

                        if (check_pasta.isChecked) {
                            textview_pasta.setBackgroundColor(colorAzul)
                        } else {
                            textview_pasta.setBackgroundColor(colorBlanco)
                        }

                    }

                }



            }

        }

        check_leche.setOnCheckedChangeListener { view, isChecked ->
            if (isChecked) {
                textview_leche.setBackgroundColor(colorElegido)
                objetos_carrito++
                CosasCompradas.add("Leche")

                if (special_switch.isChecked) {
                    textview_leche.setTextColor(colorBlanco)
                }

            } else {
                textview_leche.setBackgroundColor(colorBlanco)
                textview_leche.setTextColor(colorNegro)
                objetos_carrito--
                CosasCompradas.remove("Leche")
            }

            if (objetos_carrito == 0) {
                imagen_carro.setImageResource(R.drawable.carro_vacio_x)
            } else {
                imagen_carro.setImageResource(R.drawable.carro_lleno_x)
            }

        }

        check_pan.setOnCheckedChangeListener { view, isChecked ->
            if (isChecked) {
                textview_pan.setBackgroundColor(colorElegido)
                objetos_carrito++
                CosasCompradas.add("Pan")

                if (special_switch.isChecked) {
                    textview_pan.setTextColor(colorBlanco)
                }

            } else {
                textview_pan.setBackgroundColor(colorBlanco)
                textview_pan.setTextColor(colorNegro)
                objetos_carrito--
                CosasCompradas.remove("Pan")
            }

            if (objetos_carrito == 0) {
                imagen_carro.setImageResource(R.drawable.carro_vacio_x)
            } else {
                imagen_carro.setImageResource(R.drawable.carro_lleno_x)
            }

        }

        check_manzanas.setOnCheckedChangeListener { view, isChecked ->
            if (isChecked) {
                textview_manzanas.setBackgroundColor(colorElegido)
                objetos_carrito++
                CosasCompradas.add("Manzanas")

                if (special_switch.isChecked) {
                    textview_manzanas.setTextColor(colorBlanco)
                }

            } else {
                textview_manzanas.setBackgroundColor(colorBlanco)
                textview_manzanas.setTextColor(colorNegro)
                objetos_carrito--
                CosasCompradas.remove("Manzanas")
            }

            if (objetos_carrito == 0) {
                imagen_carro.setImageResource(R.drawable.carro_vacio_x)
            } else {
                imagen_carro.setImageResource(R.drawable.carro_lleno_x)
            }

        }

        check_pasta.setOnCheckedChangeListener { view, isChecked ->
            if (isChecked) {
                textview_pasta.setBackgroundColor(colorElegido)
                objetos_carrito++
                CosasCompradas.add("Pasta")

                if (special_switch.isChecked) {
                    textview_pasta.setTextColor(colorBlanco)
                }

            } else {
                textview_pasta.setBackgroundColor(colorBlanco)
                textview_pasta.setTextColor(colorNegro)
                objetos_carrito--
                CosasCompradas.remove("Pasta")
            }

            if (objetos_carrito == 0) {
                imagen_carro.setImageResource(R.drawable.carro_vacio_x)
            } else {
                imagen_carro.setImageResource(R.drawable.carro_lleno_x)
            }

        }

        special_switch.setOnCheckedChangeListener { buttonView, isChecked ->

            if (isChecked) {

                if (check_leche.isChecked) {
                    textview_leche.setTextColor(colorBlanco)
                } else {
                    textview_leche.setTextColor(colorNegro)
                }

                if (check_pan.isChecked) {
                    textview_pan.setTextColor(colorBlanco)
                } else {
                    textview_pan.setTextColor(colorNegro)
                }

                if (check_manzanas.isChecked) {
                    textview_manzanas.setTextColor(colorBlanco)
                } else {
                    textview_manzanas.setTextColor(colorNegro)
                }

                if (check_pasta.isChecked) {
                    textview_pasta.setTextColor(colorBlanco)
                } else {
                    textview_pasta.setTextColor(colorNegro)
                }

            } else {

                textview_leche.setTextColor(colorNegro)
                textview_pan.setTextColor(colorNegro)
                textview_manzanas.setTextColor(colorNegro)
                textview_pasta.setTextColor(colorNegro)

            }

        }

        boton_comprar.setOnClickListener {

            // Escribir Lista
            if (CosasCompradas.isEmpty()) {

                texto_compra = "No has comprado nada"

            } else {

                for (elemento in CosasCompradas) {

                    if (elemento == CosasCompradas.last()) {

                        if (objetos_carrito == 1) {
                            texto_compra += elemento + "."
                        } else {
                            texto_compra += "y " + elemento + "."
                        }

                    } else if (elemento == CosasCompradas[CosasCompradas.size - 2]) {
                        texto_compra += elemento + " "
                    } else {
                        texto_compra += elemento + ", "
                    }

                }

            }

            textview_lista.text = texto_compra

            // Reiniciar
            special_switch.isChecked = false

            check_leche.isChecked = false
            check_pan.isChecked = false
            check_manzanas.isChecked = false
            check_pasta.isChecked = false

            CosasCompradas.clear()

            radio_group.clearCheck()

            texto_compra = "Has comprado: "

        }

    }
}