package com.example.ejercicio1

import android.os.Bundle
import android.util.Log
import android.widget.Button
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
import com.example.ejercicio1.ui.theme.Ejercicio1Theme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.layout)

        val top_button: Button = findViewById(R.id.top_button)
        val bottom_button: Button = findViewById(R.id.bottom_button)

        top_button.setOnClickListener() {

            Toast.makeText(this, "Botón de arriba pulsado", Toast.LENGTH_SHORT).show()

            Log.i("Arriba", "Botón de arriba pulsado")

        }

        bottom_button.setOnClickListener() {

            Toast.makeText(this, "Botón de abajo pulsado", Toast.LENGTH_SHORT).show()

            Log.i("Abajo", "Botón de abajo pulsado")

        }

    }
}