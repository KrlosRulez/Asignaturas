package com.example.dialog_example

import android.app.Dialog
import android.os.Bundle
import android.widget.Button
import android.widget.CheckBox
import android.widget.EditText
import android.widget.TextView
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.appcompat.app.AppCompatActivity
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import com.example.dialog_example.ui.theme.Dialog_ExampleTheme

class MainActivity : AppCompatActivity(), SimpleDialogFragment.CustomDialogListener {

    private lateinit var eleccion_usuario: TextView
    private lateinit var info_usuario: TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        eleccion_usuario = findViewById<TextView>(R.id.eleccion_usuario)
        val boton_simple = findViewById<Button>(R.id.boton_simple)
        info_usuario = findViewById<TextView>(R.id.info_usuario)
        val boton_personalizado = findViewById<Button>(R.id.boton_personalizado)

        boton_simple.setOnClickListener {
            val myDialog = SimpleDialogFragment()
            myDialog.show(supportFragmentManager, "123")
        }

        boton_personalizado.setOnClickListener {
            showCustomDialog()
        }

    }

    // Botón Simple
    override fun onButtonClicked(buttonText: String) {
        // Aquí recibes el texto del botón pulsado desde el diálogo
        eleccion_usuario.text = buttonText
    }

    // Botón Personalizado
    private fun showCustomDialog() {
        val dialog = Dialog(this)
        dialog.setContentView(R.layout.activity_second)

        val boton = dialog.findViewById<Button>(R.id.boton)
        val nombre_usuario = dialog.findViewById<EditText>(R.id.nombre_usuario)
        val password_usuario = dialog.findViewById<EditText>(R.id.password_usuario)
        val check_box = dialog.findViewById<CheckBox>(R.id.check_box)

        boton.setOnClickListener {
            val usuario = nombre_usuario.text.toString()
            val password = password_usuario.text.toString()
            val recordar_datos = check_box.isChecked

            val info = "Usuario: $usuario \nContraseña: $password \n¿Recordar?: $recordar_datos"
            info_usuario.text = info

            dialog.dismiss() // Cerrar el diálogo después de obtener la información
        }

        dialog.show()
    }

}