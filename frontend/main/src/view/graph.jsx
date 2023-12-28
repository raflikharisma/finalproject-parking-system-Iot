import React, { useState, useEffect } from 'react';
import Chart from 'chart.js/auto';
import './view.css';
import { Line } from "react-chartjs-2";

const RealTimeGraph = () => {
    const [data, setData] = useState([]);
    let myChart;
    const fetchData = async () => {
        try {
            const response = await fetch('http://localhost/tugas-besar-pirdas/backend/graphapi.php');
            const newData = await response.json();
            setData(newData);
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    };

    useEffect(() => {
       
        fetchData();
        if (myChart) {
            myChart.destroy();
        }
     
        const intervalId = setInterval(fetchData, 1000);
        return () => clearInterval(intervalId);
    }, []);

    const chartData = {
        labels: data.map(entry => entry.time), 
        datasets: [{
            label: 'Graph Jarak',
            data: data.map(entry => entry.jarak), 
            borderColor: "black",
            borderWidth: 2,
            fill: false,
            tension: 0.1,
        }],
    };

    return (
        <div id='chart' className='rounded-md '>
            <Line data={chartData} />
        </div>
    );
};

export default RealTimeGraph;
