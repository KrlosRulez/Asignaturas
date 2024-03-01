package com.example.contextual_menu

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.ContextMenu
import android.view.MenuInflater
import android.view.MenuItem
import android.view.View
import android.widget.TextView

class MainActivity : AppCompatActivity() {

    private lateinit var text_view : TextView

    override fun onCreate(savedInstanceState: Bundle?) {

        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        text_view  = findViewById(R.id.text_view)

        registerForContextMenu(text_view)

    }

    override fun onCreateContextMenu(menu: ContextMenu, v: View,
                                     menuInfo: ContextMenu.ContextMenuInfo?) {
        super.onCreateContextMenu(menu, v, menuInfo)
        val inflater: MenuInflater = menuInflater
        inflater.inflate(R.menu.my_menu, menu)
    }

    override fun onContextItemSelected(item: MenuItem): Boolean {

        return when (item.itemId) {
            R.id.krlos -> {
                text_view.setText(R.string.krlos)
                true
            }

            R.id.betis -> {
                text_view.setText(R.string.betis)
                true
            }

            R.id.pedro -> {
                text_view.setText(R.string.pedro)
                true
            }

            else -> super.onContextItemSelected(item)
        }

    }

}