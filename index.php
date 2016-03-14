<?php
/**
 * Created by PhpStorm.
 * User: samchen
 * Date: 3/14/16
 * Time: 9:32
 */

// Produce a message
$kafka = new Kafka("localhost:9092");
$kafka->produce("topic_name", "logoocc");
//get all the available partitions
$partitions = $kafka->getPartitionsForTopic('topic_name');
//use it to OPTIONALLY specify a partition to consume from
//if not, consuming IS slower. To set the partition:
$kafka->setPartition($partitions[0]);//set to first partition
//then consume, for example, starting with the first offset, consume 20 messages
$msg = $kafka->consume("topic_name", Kafka::OFFSET_BEGIN, 20);
var_dump($msg);//dumps array of messages
//$kafka = new Kafka("localhost:9092");
//$kafka->produce("topic_name", "message content");
//$kafka->consume("topic_name", 1172556);
