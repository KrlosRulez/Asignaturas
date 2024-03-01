package com.example.dialog_example

import android.app.Dialog
import android.content.Context
import android.content.DialogInterface
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.appcompat.app.AlertDialog
import androidx.fragment.app.DialogFragment

class SimpleDialogFragment : DialogFragment() {

    private var customDialogListener: CustomDialogListener? = null

    override fun onCreateDialog(savedInstanceState: Bundle?): Dialog {

        // Crear y devolver el diálogo
        // Al clickar un botón, se llama al método onButtonClicked
        return activity?.let {
            val builder = AlertDialog.Builder(it)
            builder.setMessage("Elige una opción")
                .setPositiveButton("OK",
                    DialogInterface.OnClickListener { dialog, id ->
                        customDialogListener?.onButtonClicked("OK")
                    })
                .setNegativeButton("Cancelar",
                    DialogInterface.OnClickListener { dialog, id ->
                        customDialogListener?.onButtonClicked("Cancelar")
                    })
            builder.create()
        } ?: throw IllegalStateException("Activity cannot be null")

    }

    // Interfaz para comunicarse con MainActivity
    interface CustomDialogListener {
        fun onButtonClicked(buttonText: String)
    }

    // Se asigna el contexto de la actividad al customDialogListener
    // Para que MainActivity Responda a los eventos del DialogFragment
    override fun onAttach(context: Context) {
        super.onAttach(context)
        customDialogListener = context as CustomDialogListener
    }

}