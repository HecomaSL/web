<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Incorporamos robot Vollmer QXD250 | HECOMA" />

  <MainLayout>
    <section class="bg-[#010cf7] py-6 mb-12">
      <div class="container mx-auto px-6">
        <h1 class="text-white text-3xl md:text-4xl font-bold text-center uppercase tracking-wide">Incorporamos a nuestra cadena de producción del robot Vollmer QXD250 en nuestra planta de Sonseca</h1>
      </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
      <div class="max-w-6xl mx-auto space-y-6 text-gray-700 leading-relaxed text-lg">
        <div class="flex justify-center">
          <img src="/images/noticias/robot-vollmer-qxd250.png" alt="Vollmer QXD250">
        </div>
        <p>La máquina que se incorpora, la Vollmer QXD250,  desarrolla tareas de acabado y mantenimiento de herramientas con superficies de corte elaboradas con diamante policristalino (PCD). Disponemos en la actualidad de 3 máquinas robotizadas para trabajar este material. El diamante se ha impuesto en el sector industrial de la madera, ya que en la actualidad se trabaja con gran variedad de modernos materiales. Estos nuevos materiales (muy abrasivos) exigen precisión, calidad de acabado y resistencia muy alta a la herramienta, terreno donde brilla sin comparación el diamante.</p>
        <p>Por tanto, la demanda sigue creciendo, y es necesario ampliar nuestra capacidad, una vez mas, con una nueva máquina con capacidad de carga automática. En la actualidad, solo disponemos de una con esa tecnología y el resto solo disponen de carga manual. La solución de carga automática de las herramientas incrementa la productividad hasta 2,5 veces, a la vez que mejora la seguridad del operario. La inversión contempla la maquina, el software de control y gestión, los diferentes utillajes, sistemas refrigerantes y de captura de vapores de aceite, aceites de corte, y la adaptación de la instalación eléctrica necesaria. La puesta en marcha por los técnicos del fabricante y la formación de los usuarios de la máquina.</p>
        <p>Su capacidad de trabajo, la calidad de acabados y la muy elevada precisión que nos proporciona, incrementa, aún mas, la calidad de nuestra herramienta, su precisión y su duración.  Un paso mas adelante, en la constante mejora de nuestros productos, su plazo de entrega y en la mejora de productividad de nuestra herramienta para nuestros clientes.</p>
        <p>Se ha recibido un incentivo de la Junta de Comunidades de Castilla la Mancha, por un importe de 84.116,37€, cofinanciada en un 80% por la Unión Europea a través del Fondo Europeo de desarrollo regional,  FEDER para la realización del proyecto:</p>
        <div class="flex justify-center">
          <h2 class="text-center text-[#010cf7] text-3xl font-bold">«Conseguir un tejido empresarial mas competitivo»</h2>
        </div>
        <p>Les dejamos, unas fotos de la máquina en nuestras instalaciones y un vídeo demostrativo de la operación de la máquina, que nos ha cedido el fabricante.</p>
        <div class="flex justify-center">
          <img src="/images/noticias/QXD250-vista-cargador.jpg" alt="Robot QXD250">
        </div>
        <div class="flex justify-center">
          <div class="video-container shadow-xl rounded-lg overflow-hidden">
            <iframe src="https://www.youtube.com/embed/vozx_kRapuU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
        </div>
        <div class="flex justify-center">
          <img src="/images/noticias/SUBVENCION-FIE2023.jpg" alt="">
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
  /* --- Divs --*/
  .custom-card { font-size: 16px; background-color: #f0f4f8; }
  @media (max-width: 768px) { .custom-card { font-size: 13px; width: 100%; } }
  h3 { letter-spacing: -0.01em; line-height: 1.2; }
  /* -- fin divs --*/

  p { text-align: justify; line-height: 1.6; }
  h2 { line-height: 1.2; text-align: justify; }
  
  .table-container { font-size: 16px; }
  thead { background-color: blue; }
  @media (max-width: 768px) { thead { font-size: 10px; } tbody { font-size: 10px; } }
  table { border-collapse: collapse; table-layout: fixed; width: 100%; border: 1px solid red; }
  th { padding-top: 2%; padding-bottom: 2%; font-size: 1em; font-weight: bold; text-transform: uppercase; line-height: 1.2; vertical-align: middle; border: 1px solid red; }
  td { padding: 3%;font-size: 0.8em; line-height: 1.3; word-wrap: break-word; overflow-wrap: break-word; vertical-align: middle; border: 1px solid red; }
  @media (min-width: 768px) { th, td { padding-top: 2%; padding-bottom: 2%; } }
  td:first-child { letter-spacing: -0.01em; }

  /* --- Boton ---*/
  .btn-mdi-dark { background-color: #003399; color: #ffffff; font-weight: 700; text-transform: uppercase; border: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; border-radius: 2px; transition: all 0.3s ease; padding: 1rem 3rem; font-size: 16px; width: auto; letter-spacing: 0.05em; }
  .btn-mdi-dark:hover { background-color: #002266; transform: translateY(-1px); }
  @media (max-width: 768px) { .btn-mdi-dark { font-size: 13px;  padding: 0.9rem 1.5rem; width: 100%; } }
  .bf { text-align: center; }
  /* --- fin Boton ---*/

  /* --- Video ---*/
  .video-container { position: relative; width: 100%; max-width: 100%; padding-bottom: 56.25%; height: 0; }
  /* El iframe ocupa todo el espacio del contenedor */
  .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
  @media (max-width: 768px) { .video-container { max-width: 100%; } }
  /* --- Fin Video ---*/
</style>