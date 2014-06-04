<?php
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-06-10 at 11:10:16.
 */
class EventTest extends CDbTestCase
{
	/**
	 * @var Event
	 */
	protected $object;

	public $fixtures = array(
		'event' => 'Event',
	);

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new Event;
		parent::setUp();
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * @covers Event::model
	 */
	public function testModel()
	{
		$this->assertEquals('Event', get_class(Event::model()), 'Class name should match model.');
	}

	/**
	 * @covers Event::tableName
	 */
	public function testTableName()
	{
		$this->assertEquals('event', $this->object->tableName());
	}

	/**
	 * @covers Event::beforeSave
	 */
	public function testBeforeSave()
	{
		$event = $this->event('event1');
		$this->assertNotNull( $event->event_date );
		$event->event_date = date('Y-m-d H:i:s');
		$event->save();
		$this->assertNotEquals( '0000-00-00 00:00:00', $event->event_date );
		$this->assertNotEquals( '1900-01-01 00:00:00', $event->event_date );
	}

	/**
	 * @covers Event::defaultScope
	 * @todo   Implement testDefaultScope().
	 */
	public function testDefaultScope()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::rules
	 * @todo   Implement testRules().
	 */
	public function testRules()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::relations
	 * @todo   Implement testRelations().
	 */
	public function testRelations()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::attributeLabels
	 * @todo   Implement testAttributeLabels().
	 */
	public function testAttributeLabels()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::search
	 * @todo   Implement testSearch().
	 */
	public function testSearch()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::hasIssue
	 * @todo   Implement testHasIssue().
	 */
	public function testHasIssue()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::getIssueText
	 * @todo   Implement testGetIssueText().
	 */
	public function testGetIssueText()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::expandIssueText
	 * @todo   Implement testExpandIssueText().
	 */
	public function testExpandIssueText()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::getInfoText
	 * @todo   Implement testGetInfoText().
	 */
	public function testGetInfoText()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::addIssue
	 * @todo   Implement testAddIssue().
	 */
	public function testAddIssue()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::deleteIssue
	 * @todo   Implement testDeleteIssue().
	 */
	public function testDeleteIssue()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::deleteIssues
	 * @todo   Implement testDeleteIssues().
	 */
	public function testDeleteIssues()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::delete
	 * @todo   Implement testDelete().
	 */
	public function testDelete()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::getLatestOfTypeInEpisode
	 * @todo   Implement testGetLatestOfTypeInEpisode().
	 */
	public function testGetLatestOfTypeInEpisode()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::isLatestOfTypeInEpisode
	 * @todo   Implement testIsLatestOfTypeInEpisode().
	 */
	public function testIsLatestOfTypeInEpisode()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	/**
	 * @covers Event::audit
	 * @todo   Implement testAudit().
	 */
	public function testAudit()
	{
			// Remove the following lines when you implement this test.
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	public function testgetElements()
	{
		$et = $this->getMockBuilder('EventType')
				->disableOriginalConstructor()
				->setMethods(array('getAllElementTypes'))
				->getMock();

		$event = ComponentStubGenerator::generate('Event', array('eventType' => $et));

		$et->expects($this->once())
				->method('getAllElementTypes')
				->will($this->returnValue(array()));

		$this->assertEquals(null, $event->getElements());

		$this->markTestIncomplete('At the moment this does not test that we are actually querying the element types for the event type of the event.');

	}

}
