package com.example.spinner_app

import android.app.Activity
import android.os.Bundle
import android.view.Menu
import android.view.MenuInflater
import android.view.MenuItem
import android.view.View
import android.widget.AdapterView
import android.widget.ArrayAdapter
import android.widget.Spinner
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
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.tooling.preview.Preview
import androidx.constraintlayout.widget.ConstraintLayout
import com.example.spinner_app.ui.theme.Spinner_AppTheme
import androidx.core.content.ContextCompat

class MainActivity : AppCompatActivity() {

    private lateinit var planeta_elegido: TextView
    private lateinit var layout_planetas: ConstraintLayout

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        //setSupportActionBar(findViewById(R.id.my_toolbar))

        val planets_spinner = findViewById<Spinner>(R.id.planets_spinner)
        planeta_elegido = findViewById<TextView>(R.id.planeta_elegido)
        layout_planetas = findViewById(R.id.constraintLayout)

        // Crear un adaptador usando el Array de Strings
        ArrayAdapter.createFromResource(
            this,
            R.array.planets_array,
            android.R.layout.simple_spinner_item
        ).also { adapter ->
            adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
            planets_spinner.adapter = adapter
        }

        planets_spinner.onItemSelectedListener = object :
            AdapterView.OnItemSelectedListener {
                override fun onItemSelected(parent: AdapterView<*>, view: View?, pos: Int, id: Long) {

                    planeta_elegido.text = parent.getItemAtPosition(pos).toString()

                }

                override fun onNothingSelected(parent: AdapterView<*>) {
                    // Si no se elige nada
                }

            }

    }

    // Crear un Menú

    private fun changeBackgroundColor(color: Int) {

        layout_planetas.setBackgroundColor(ContextCompat.getColor(this, color))

    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        val inflater: MenuInflater = menuInflater
        inflater.inflate(R.menu.my_menu, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.color_azul -> {
                changeBackgroundColor(R.color.azul)
                true
            }
            R.id.color_verde -> {
                changeBackgroundColor(R.color.verde)
                true
            }
            R.id.color_naranja -> {
                changeBackgroundColor(R.color.naranja)
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }

}