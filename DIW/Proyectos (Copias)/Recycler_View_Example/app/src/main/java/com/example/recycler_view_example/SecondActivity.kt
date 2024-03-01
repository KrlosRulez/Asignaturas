package com.example.recycler_view_example

import android.app.Activity
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.EditText

class SecondActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_second)

        val edit_text = findViewById<EditText>(R.id.edit_text)
        val boton_cambiar = findViewById<Button>(R.id.boton_cambiar)

        // Crear un nuevo Intent para devolver datos a la actividad anterior
        boton_cambiar.setOnClickListener {
            val returnIntent = Intent()
            returnIntent.putExtra("texto_nuevo", edit_text.text.toString())
            returnIntent.putExtra("texto_original", intent.getStringExtra("itemText"))
            setResult(Activity.RESULT_OK, returnIntent)
            finish() // Finaliza la actividad actual y la cierra
        }

    }
}